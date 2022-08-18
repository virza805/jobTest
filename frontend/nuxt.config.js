export default {
    // Global page headers: https://go.nuxtjs.dev/config-head
    target: 'static',
    head: {
        // title: 'frontend',
        titleTemplate: '%s - Test',
        htmlAttrs: {
            lang: 'en'
        },
        meta: [
            { charset: 'utf-8' },
            { name: 'viewport', content: 'width=device-width, initial-scale=1' },
            { hid: 'description', name: 'description', content: '' },
            { name: 'format-detection', content: 'telephone=no' }
        ],
        link: [
            { rel: 'icon', type: 'image/png', href: '/favicon.png' },
            { rel: 'stylesheet', href: 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&display=swap' }
        ]
    },

    // Global CSS: https://go.nuxtjs.dev/config-css
    css: [
        "~/assets/css/app.scss"
        // { '~/assets/css/style.css' }
        // {"~/assets/app.scss"},
    ],

    // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
    plugins: [],

    // Auto import components: https://go.nuxtjs.dev/config-components
    components: true,

    // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
    buildModules: [
        // https://go.nuxtjs.dev/eslint
        '@nuxt/postcss8'
        // https://go.nuxtjs.dev/tailwindcss
        // '@nuxtjs/tailwindcss'
    ],

    // Modules: https://go.nuxtjs.dev/config-modules
    modules: [
        // https://go.nuxtjs.dev/axios
        '@nuxtjs/axios', '@nuxtjs/auth-next'
    ],


    // Axios module configuration: https://go.nuxtjs.dev/config-axios
    axios: {
        // Workaround to avoid enforcing hard-coded localhost:3000: https://github.com/nuxt-community/axios-module/issues/308
        baseURL: 'http://127.0.0.1:8000',
    },

    auth: {
        redirect: {
            login: '/auth/login',
            logout: '/',
            callback: '/auth/login',
            home: '/backend'
        },

        strategies: {

            local: {
                token: {
                    property: 'access_token',
                    global: true,
                    // required: true,
                    // type: 'Bearer'
                },
                user: {
                    property: false, // data // user
                    // autoFetch: true
                },
                endpoints: {
                    login: { url: '/api/user/login', method: 'post' },
                    logout: { url: '/api/user/logout', method: 'get' },
                    user: { url: '/api/user/user', method: 'get' }
                }
            },
        }
    },

    // Build Configuration: https://go.nuxtjs.dev/config-build
    build: {
        postcss: {
            plugins: {
                tailwindcss: {},
                autoprefixer: {},
            },
        },
    },
}