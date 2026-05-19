# Implementation Patterns

## Contents

1. Main plugin file
2. Hook registration
3. Admin settings
4. Shortcodes and output
5. AJAX and REST
6. Storage and upgrades

## Main plugin file

- Keep the entry file focused on plugin headers, direct access guards, constants, includes, and bootstrapping.
- Avoid mixing request handling, rendering, and registration logic in the main file when a helper class or include can isolate it cleanly.
- Use the plugin version consistently for asset versioning and upgrade comparisons.

## Hook registration

- Centralize `add_action()` and `add_filter()` calls where possible so load order is easy to inspect.
- Use explicit methods or named functions when callbacks may need to be removed or tested.
- Be careful with `init`, `admin_init`, `admin_menu`, `wp_enqueue_scripts`, and `admin_enqueue_scripts`; timing mistakes here often cause plugin regressions.

## Admin settings

- Prefer `register_setting()` and structured sanitization callbacks when the plugin already uses Settings API patterns.
- If the plugin uses manual forms, verify nonce and capability checks before reading `$_POST`.
- Keep field names, option names, and tab slugs stable unless a migration is included.
- Escape values on re-render, including values that were previously sanitized.

## Shortcodes and output

- Return buffered markup from shortcodes rather than printing directly.
- Escape dynamic attributes and URLs even when stored by an admin.
- If rich HTML is intentional, constrain it with `wp_kses_post()` or a custom allowlist.
- Avoid hidden dependence on globals unless the existing plugin architecture already requires it.

## AJAX and REST

- Use separate validation for permissions and payload integrity.
- Normalize response bodies so consumers can depend on them.
- For REST endpoints, define `permission_callback`, `args`, and validation callbacks for non-trivial inputs.

## Storage and upgrades

- Prefer options for configuration and custom tables only for structured or high-volume data.
- Use idempotent upgrade routines keyed by stored plugin version.
- For custom tables, keep schema creation strings stable if `dbDelta()` is involved.
- Decide whether uninstall should delete settings, generated files, and custom tables; make that behavior explicit.
