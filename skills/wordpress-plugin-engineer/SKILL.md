---
name: wordpress-plugin-engineer
description: Build, debug, refactor, review, and harden WordPress plugins written in PHP. Use when Codex needs to work on plugin bootstrap files, hook registration, admin menus, settings forms, shortcodes, widgets, enqueue logic, AJAX handlers, REST routes, custom tables, activation or uninstall routines, capability checks, nonces, escaping, sanitization, WordPress.org packaging, or backward-compatibility issues in legacy plugin codebases.
---

# WordPress Plugin Engineer

Treat WordPress as the primary execution environment. Favor core APIs, stable hook timing, and backward compatibility over framework-style rewrites that do not fit the plugin.

## Workflow

1. Map the plugin entrypoint and load order.
Read the main plugin file first. Identify constants, includes, activation and deactivation hooks, shortcode or widget registration, admin page bootstrapping, and where assets are enqueued.

2. Classify the task by WordPress boundary.
Decide whether the change is mainly about:
- plugin lifecycle
- admin UI and settings
- frontend rendering
- assets and enqueue timing
- AJAX or REST
- data storage or migrations
- security and capability boundaries
- release compatibility or packaging

3. Preserve public integration points.
Avoid breaking option names, shortcode tags, action or filter names, REST paths, table names, and text domains unless the task explicitly calls for a breaking change with migration work.

4. Validate at the runtime boundary.
Check capability gates, nonce verification, sanitization, escaping, hook timing, translation wrappers, asset scope, and upgrade or uninstall behavior before considering the task complete.

## Engineering Rules

- Sanitize on input and escape on output. Do not treat one as a substitute for the other.
- Use `current_user_can()` for authorization. Nonces confirm intent and request freshness, not permissions.
- Prefer WordPress APIs over raw globals or direct SQL when the API is sufficient.
- If SQL is necessary, use `$wpdb->prepare()` and dynamic table prefixes.
- Keep handlers thin. Move reusable logic out of menu callbacks, shortcode functions, AJAX endpoints, and REST callbacks.
- Be conservative with refactors in legacy plugins that still support older WordPress or PHP versions.
- Keep admin assets scoped to the relevant screen instead of enqueueing everywhere.

## Implementation Guidance

### Lifecycle

- Keep the main plugin file small: headers, guards, includes, hooks, and bootstrap.
- Register activation, deactivation, and uninstall routines predictably.
- For persisted data changes, use versioned upgrade routines that are safe to run more than once.
- Avoid expensive work on every request if it can happen on activation or deferred one-time upgrade.

### Admin Pages and Settings

- Prefer the Settings API or established project conventions over ad hoc `$_POST` writes.
- Verify both capabilities and nonces around state-changing actions.
- Keep labels, help text, and notices translatable.
- Escape values for the exact sink: `esc_html()`, `esc_attr()`, `esc_url()`, `wp_kses_post()`.

### Frontend Rendering

- Return content from shortcodes instead of echoing when possible.
- Treat shortcode attributes, option values, and saved HTML as untrusted until validated or escaped.
- Check duplicate IDs, inline styles, and asset dependencies when changing rendered markup.

### Assets and Hooks

- Verify enqueue timing and screen scope before editing styles or scripts.
- Prefer named callbacks over anonymous closures when hooks may need removal or tests.
- Document non-default hook priorities when ordering matters.

### AJAX and REST

- For AJAX, terminate with `wp_send_json_success()`, `wp_send_json_error()`, or `wp_die()` consistently.
- For REST, define `permission_callback` explicitly and validate or sanitize request arguments.
- Return stable response shapes so admin JavaScript or third-party callers do not break on minor updates.

### Data and Cleanup

- Prefer the Options API for settings unless query patterns justify custom tables.
- When using custom tables, derive charset and collation from `$wpdb->get_charset_collate()`.
- Make uninstall behavior explicit. Delete only what the plugin is responsible for deleting.
- Treat multisite behavior as a separate requirement instead of assuming single-site logic generalizes cleanly.

## Legacy Plugin Notes

When the plugin resembles older WordPress code, such as:
- global functions instead of namespaced classes
- constants in include files
- `add_menu_page()` plus manual form processing
- shortcode-driven frontend output
- version compatibility with older PHP releases

do not force a modern architecture rewrite unless the user asks for one. Prefer small, compatible improvements that reduce risk:
- isolate validation and persistence logic
- tighten nonce and capability checks
- scope assets correctly
- replace unsafe output with contextual escaping
- add upgrade guards before changing stored data

## Review Mode

When asked to review a plugin patch, prioritize findings in this order:
1. missing capability checks
2. nonce misuse or absence
3. unsanitized input or unescaped output
4. hook timing and lifecycle regressions
5. option, shortcode, route, or schema compatibility breaks
6. asset loading leaks across admin or frontend
7. missing validation or release checks for WordPress-specific behavior

## References

- Read [references/implementation-patterns.md](references/implementation-patterns.md) for concrete implementation choices and common WordPress plugin patterns.
- Read [references/review-checklist.md](references/review-checklist.md) for a compact audit checklist during review, hardening, or release prep.
