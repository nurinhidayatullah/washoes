<template>
<form @submit.prevent="addToCart"> 
  <div class="container-order">
    <div class="order-form">
        <div class="input-title">
            <NuxtLink to='/'>
            <p><i class="material-icons">arrow_back</i></p>
            </NuxtLink>
            <p>Add Item</p>
        </div>
        <div class="input-form">
            <label>Service Package</label><br>
            <select v-model="title" class="select-serv" :required="true">
                <option v-for="service in services"
                :key="service.id"
                >
                {{service.title}}
                </option>
            </select><br>
            <label>Describe your item</label><br>
            <textarea v-model="description" placeholder="you can add size, brand, or condition" />
        </div>
        <div class="submit-btn">
            <button type="submit">Submit</button>
        </div>
    </div>
  </div>
</form>
</template>

<script>
import {mapState} from 'vuex'
export default {
    name: 'OrderPage',
    async fetch({store, params}) {
      await store.dispatch('FETCH_SERVICES')
    },
    data () {
        return {
            _id: 0,
            title: '',
            description: '',
        } 
    },
    computed: {
        ...mapState(['services']),
    },
    methods: {
        addToCart () {
            const payload = {
                title: this.title,
                description: this.description
            }
            this.$store.dispatch('addToCart', payload)
            this.$router.push('/')
        }
    },
    mounted() {
        this._id = +this.$route.query.item
        this.services.forEach(el => {
            if(el.id == +this.$route.query.item) {
                return this.title = el.title
            }
        })
    }
} 
</script>
