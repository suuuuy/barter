import axios from 'axios'

const state = () => {
    return {
        categories: [],
    };
};

const getters = {
    allCategory: state => state.categories,
};

const actions = {
    async fetchCategories({commit}, data){
        const response = await axios.get('/api/categories')
        
        commit('setCategories', response.data)
    }
};

const mutations = {
    setCategories: (state, categories) => (state.categories = categories)
};

export default {
    state,
    getters,
    actions,
    mutations
};