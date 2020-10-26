<template>
  <div>
    <NavBar />
    <div class="container">
      <!-- tab-menu -->
      <div class="menu">
        <div v-for="(service, index) in services" :key="index" >
          <button @click="menuClick(index)" :class="[visibles === index ? 'active' : 'submenu']">
            <h1>{{ service.title }}</h1>
          </button>
        </div>
      </div>
      <!-- slider-box -->
      <Carousel :services="services" />
    </div>
  </div>
</template>

<script>
import Carousel from '../components/carousel';
import NavBar from '../components/navigation'
import {mapState} from 'vuex'
export default {
  async fetch({store, params}) {
    await store.dispatch('FETCH_SERVICES')
  },
  components: {
    Carousel,
    NavBar
  },
  computed: {
    ...mapState(['services']),
    ...mapState(['visibles']),
  },
  methods: {
    menuClick(idx) {
      this.$store.dispatch('menuClick', idx)
    }
  }
}
</script>
