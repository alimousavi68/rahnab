# Workflow: /seed

## 1. Goal (هدف)
Initialize or refresh demo content, core pages, navigation menus, and theme mods idempotently and non-destructively, ensuring the converted WordPress theme immediately mirrors the prototype upon activation.

## 2. Inputs (ورودی)
- Target companion plugin directory containing `seed/` modules.
- Optional `--force` flag: Forces re-execution even if the seed version option has already been recorded.

## 3. Execution Steps (مراحل اجرا)

### Step 1: Verify Modular Seed Architecture
Ensure the companion plugin possesses the 5 modular seed workers:
1. `seed-manager.php`: Central runner and version tracker.
2. `pages.php`: Idempotent generator for Home, Blog, About, Contact pages.
3. `menus.php`: Idempotent generator for Primary Navigation.
4. `customizer.php`: Non-destructive populator for `theme_mods`.
5. `demo-content.php`: Populator for sample CPT posts and terms.

### Step 2: Trigger Seed Engine
The seeding pipeline can be executed via three paths:
- **Method A (Plugin Activation):** Deactivate and re-activate the companion plugin in WordPress Admin.
- **Method B (WP-CLI):**
  ```bash
  wp eval 'Modern_Corp_Seed_Manager::run(true);'
  ```
- **Method C (Admin Dashboard Tool):** Dedicated trigger button under Tools > Seed Demo Data.

### Step 3: Verify Idempotency & Non-Destructive Operation
- Confirm no duplicate "Home" or "About" pages were created.
- Confirm static homepage settings (`show_on_front = page`) point to the newly seeded Home page.
- Confirm custom user edits to `theme_mods` were preserved.

## 4. Expected Output (خروجی مورد انتظار)
- Standard pages created with proper slugs.
- Static homepage and posts page assigned.
- Primary menu assigned to `primary-menu` theme location.
- Sample CPT items populated with custom field metadata.
- JSON or console execution report showing items created or skipped.
