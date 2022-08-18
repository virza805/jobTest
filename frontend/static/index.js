export default {
    // State
    // mutation

    state() {
        return {
            count: 0,
            name: "Tanvir",
            appName: "Bengle Shop",
        };
    },

    mutations: {
        increment(state) {
            state.count++;
        }
    }

}
