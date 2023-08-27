// @ts-ignore
const { test, expect } = require('@playwright/test');

test('Test My WordPress Plugin', async ({ page }) => {
	// Open your WordPress site or a specific page
	await page.goto('http://localhost:8889');

	// Example test case to check if the plugin's output is correct
	const pluginOutput = await page.textContent('h1.site-title');
	expect(pluginOutput).toBe('myplugin');
});
