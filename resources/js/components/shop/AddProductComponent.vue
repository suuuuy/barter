<template>
    <div>
        <button class="btn btn-primary btn-sm" @click="drawer = true" type="primary" style="margin-left: 16px;">Add Product</button>
        
        <el-drawer
            title="Post Product"
            size="40%"
            :visible.sync="drawer"
            :direction="direction"
            :before-close="handleClose">
            <div class="px-3">
                <el-form :model="productForm" ref="productForm" label-width="120px" label-position="top">
                    <el-form-item label="Product Name" prop="product_name">
                        <el-input placeholder="Please input" v-model="productForm.product_name"></el-input>
                    </el-form-item>
                    <el-form-item label="Product Description" prop="product_description">
                        <ckeditor :editor="editor" v-model="productForm.product_description" :config="editorConfig"></ckeditor>
                    </el-form-item>
                    <el-col :span="6">
                        <el-form-item label="Product Category" prop="category_id">
                            <el-select v-model="productForm.category_id" clearable placeholder="Select" style="width: 90%">
                                <el-option
                                v-for="category in allCategory"
                                :key="category.id"
                                :label="category.category_name"
                                :value="category.id">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                    <el-col :span="6">
                        <el-form-item label="Price" prop="price">
                            <el-input placeholder="Please input" v-model="productForm.price" style="width: 90%"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="6">
                        <el-form-item label="Quantity" prop="quantity">
                            <el-input placeholder="Please input" v-model="productForm.quantity" style="width: 90%"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="6">
                        <el-form-item label="Product Availability" prop="status">
                            <el-select v-model="productForm.status" clearable placeholder="Select" style="width: 90%">
                                <el-option
                                v-for="status in productAvailability"
                                :key="status.value"
                                :label="status.label"
                                :value="status.value">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                    <el-col :span="12">                        
                        <el-form-item label="Upload Image" prop="image">
                            <input type="file" class="form-control-file" id="productImage" v-on:change="processFile($event)" accept='image/*' />
                        </el-form-item>
                    </el-col>
                    <el-col :span="24">
                        <div class="float-right">                            
                            <el-form-item>
                                <el-button type="primary" @click="submitForm('productForm')">Create</el-button>
                                <el-button @click="resetForm('productForm')">Reset</el-button>
                            </el-form-item>
                        </div>
                    </el-col>
                </el-form>
            </div>
        </el-drawer>
    </div>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import { mapGetters, mapActions, mapMutations } from 'vuex';
    export default {
        props: ['userAuth'],
        data() {
            return {
                config: {
                    headers: {
                        contentType: "application/json",
                        'Authorization': 'Bearer ' + this.userAuth.api_token
                    }
                },
                drawer: false,
                direction: 'rtl',
                editor: ClassicEditor,
                editorConfig: {
                    // The configuration of the rich-text editor.
                },
                productAvailability: [{
                    value: 'trade',
                    label: 'For Trade'
                    }, {
                    value: 'sale',
                    label: 'For Sale'
                }],
                productForm: {
                    product_name: '',
                    product_description: '',
                    category_id: '',
                    price: '',
                    image: null,
                    quantity: '',
                    availability: '',
                }
            };  
        },
        computed: mapGetters(['allCategory']),
        created(){
            this.fetchCategories();
        },
        methods: {
            ...mapActions(['fetchCategories']),
            processFile(event) {
                console.log(event)
                this.productForm.image = event.target.files[0]
            },
            submitForm(formName) {
                this.$refs[formName].validate((valid) => {
                if (valid) {
                    alert('submit!');
                } else {
                    console.log('error submit!!');
                    return false;
                }
                });
            },
            resetForm(formName) {
                this.$refs[formName].resetFields();
            },
            handleClose(done) {
                this.$confirm('Are you sure you want to close this?')
                .then(_ => {
                    done();
                })
                .catch(_ => {});
            }
        }
    }
</script>

<style lang="scss">
.ck-content { height:200px; }
.el-drawer__body {
		height: 100%;
		box-sizing: border-box;
		overflow-y: auto;
	}
</style>