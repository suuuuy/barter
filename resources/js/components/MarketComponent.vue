<template>
    <div>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" style="color:#525f7f"><i class="fas fa-shopping-cart"></i></span>
            </div>
            <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Search Product">
            <div class="input-group-append">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</button>
                <div class="dropdown-menu" >
                    <div v-for="category in allCategory" :key="category.id">
                        <a class="dropdown-item" href="#">{{category.category_name}}</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class=mt-3>
            <div class="row">                
                <div class="col-md-3 mb-4" v-for="product in products" :key="product.id">
                    <a href="">                        
                        <div class="card h-100">
                            <img :src="product.image" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title">{{product.product_name}}</h5>
                                <p class="card-text text-truncate" style="max-width: 300px;">{{product.product_description}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions, mapMutations } from 'vuex';
    export default {
        data() {
            return {
                products: [{
                    id: 1,
                    product_name: 'Vintage Coin 1',
                    product_description: 'This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.',
                    image: 'http://res.cloudinary.com/phalumaan/image/upload/v1571376333/mmc3n6hzee8fzaxkyjyg.jpg'
                },{
                    id: 2,
                    product_name: 'Vintage Coin 2',
                    product_description: 'This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.',
                    image: 'http://res.cloudinary.com/phalumaan/image/upload/v1571376333/mmc3n6hzee8fzaxkyjyg.jpg'
                },{
                    id: 3,
                    product_name: 'Vintage Coin 3',
                    product_description: 'This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.',
                    image: 'http://res.cloudinary.com/phalumaan/image/upload/v1571376333/mmc3n6hzee8fzaxkyjyg.jpg'
                },{
                    
                    id: 4,
                    product_name: 'Vintage Coin 4',
                    product_description: 'This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.',
                    image: 'http://res.cloudinary.com/phalumaan/image/upload/v1571376333/mmc3n6hzee8fzaxkyjyg.jpg'
                }]
            };
        },
        computed: mapGetters(['allCategory']),
        created(){
            this.fetchCategories();
        },
        methods: {
            ...mapActions(['fetchCategories'])
        }
    }
</script>

<style lang="scss" scoped>

</style>