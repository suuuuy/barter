import axios from 'axios'

const state = () => {
    return {
        products: [],
    };
};

const getters = {
    allProducts: state => state.products,
};

const actions = {
    async fetchProducts({commit}, data){
        const response = await axios.get('/api/categories')
        
        commit('setCategories', response.data)
    },

    async addProduct({commit}, product){
        const response = await axios.post('/api/products', product.values, product.config);

    }
};

const mutations = {
    setProducts: (state, products) => (state.products = products)
};

export default {
    state,
    getters,
    actions,
    mutations
};