module.exports = {
    extends: ['prettier', 'eslint:recommended'],
    parser: 'babel-eslint',
    parserOptions: {
        ecmaVersion: 6,
        sourceType: 'module',
    },
    plugins: [
        'prettier',
        'jest',
    ],
    rules: {
        'prettier/prettier': [
            'warn',
            {
                singleQuote: false,
                trailingComma: 'all',
                tabWidth: 4,
            },
        ],
        'no-console': 'warn',
        eqeqeq: ['error', 'always'],
        'no-sparse-arrays': 'off',
    },
    env: {
        'node': true,
        'browser': true,
        'jest': true
    }
};
