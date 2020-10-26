<template>
    <div class="cart-container">
      <div class="cart-content">
        <h1>Order List</h1>
        <table class="tables">
          <tr>
            <th>No.</th>
            <th>Service</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
          <CartItem v-for="(cart, index) in carts" :key="index" :cart="cart" :index="index" />
        </table>
        <div class="back-btn">
          <button @click.prevent="toHome">Back To Home</button>
        </div>
      </div>
    </div>
</template>

<script>
import CartItem from '../../components/cart-item'
import {mapState} from 'vuex'
export default {
  components: {
      CartItem
  },
  async fetch({store, params}) {
    await store.dispatch('FETCH_CARTS')
  },
  computed: {
    ...mapState(['carts']),
  },
  methods: {
      toHome() {
          this.$router.push('/')
      }
  }
}
</script>
