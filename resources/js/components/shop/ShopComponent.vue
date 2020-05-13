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

        {{allCategory}}
    </div>
</template>

<script>
import { mapGetters, mapActions, mapMutations } from 'vuex';
    export default {
        data() {
            return {
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