import Vue from 'vue';
import Vuex from 'vuex';

import categoryStore from './categoryStore';

Vue.use(Vuex);
Vue.config.debug = true;

const debug = process.env.NODE_ENV !== 'production';

export default new Vuex.Store({
    modules: {
        categoryStore
    },
    strict: debug
});