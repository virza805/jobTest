import { createStore } from 'vuex';
import staffs from "./staffs";

const store = createStore({
    modules: {
        staffs,
    }
});


export default store;