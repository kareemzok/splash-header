# Review Checklist

## Contents

1. Security
2. Hooking and lifecycle
3. Data and upgrades
4. Rendering and assets
5. Compatibility and release

## Security

- Does every privileged action enforce `current_user_can()`?
- Are nonces present and verified on all state-changing admin and AJAX requests?
- Is request data sanitized before use?
- Is rendered output escaped for the correct context?
- Are SQL queries prepared and identifiers handled safely?

## Hooking and lifecycle

- Did any hook names, priorities, or load timing change?
- Do activation, deactivation, upgrade, and uninstall flows still make sense together?
- Is expensive work running on every request unnecessarily?

## Data and upgrades

- Did option names, defaults, or serialized shapes change?
- Is there a safe upgrade path for persisted data?
- Could multisite behave differently from single-site?
- Does uninstall remove only the intended data?

## Rendering and assets

- Do shortcodes, widgets, or admin screens still render valid markup?
- Are styles and scripts enqueued only on the correct screens or frontend views?
- Are translation wrappers still present for user-facing strings?

## Compatibility and release

- Does the patch remain compatible with the minimum supported PHP and WordPress versions?
- Does it rely on newer APIs without guards?
- Do plugin headers, readme metadata, or version constants need updating?
- Is there a manual validation path for both admin and frontend behavior?
