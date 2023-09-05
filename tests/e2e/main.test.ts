//@ts-ignore
const { test, expect } = require('@wordpress/e2e-test-utils-playwright');

test.describe('My Plugin', () => {
	test.beforeEach(async ({ admin }) => {
		// Activate your plugin before each test if it's not already active
	});

	test('Plugin is active', async ({ admin }) => {
		// Visit the plugins page in the WordPress admin
		await admin.visitAdminPage('plugins.php');

		// Check if the "Deactivate My Plugin" button with the specified attributes exists
		const deactivateButton = await admin.page.$('[id="deactivate-my-plugin"]');

		expect(deactivateButton).not.toBeNull();
	});
});

