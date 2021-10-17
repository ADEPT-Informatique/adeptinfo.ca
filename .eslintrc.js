module.exports = {
	root: true,
	parser: "@typescript-eslint/parser",
	ignorePatterns: ["**/*.scss"],
	parserOptions: {
		ecmaVersion: 2020,
	},
	rules: {
		semi: 2,
		"unused-imports/no-unused-imports": "error",
		"require-jsdoc": 0,
		"valid-jsdoc": 0,
		"new-cap": 0,
	},
	plugins: ["@typescript-eslint", "html", "unused-imports"],
	extends: [
		"google",
		"eslint:recommended",
		"plugin:@typescript-eslint/recommended",
		"prettier",
	],
	env: {
		browser: true,
		amd: true,
		node: true,
	},
};
