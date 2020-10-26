<template>
<form @submit.prevent="update"> 
  <div class="container-order">
    <div class="order-form">
        <div class="input-title">
            <NuxtLink to='/carts'>
              <p><i class="material-icons">arrow_back</i></p>
            </NuxtLink>
            <p>Edit Item</p>
            <NuxtLink to='/'>
              <p><i class="material-icons">home</i></p>
            </NuxtLink>
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
    async fetch({store, params}) {
      await store.dispatch('FETCH_SERVICES')
      await store.dispatch('FETCH_CARTS')
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
        ...mapState(['carts']),
    },
    methods: {
        update () {
            const payload = {
                id: this._id,
                title: this.title,
                description: this.description
            }
            this.$store.dispatch('update', payload)
            this.$router.push('/carts')
        }
    },
    mounted() {
        this._id = +this.$route.query.item
        this.services.forEach(el => {
            if(el.id == +this.$route.query.item) {
                this.title = el.title
            }
        })
        this.carts.forEach(elem => {
            if(elem.id == +this.$route.query.item) {
                this.description = elem.desription
            }
        })
    }
} 
</script>
