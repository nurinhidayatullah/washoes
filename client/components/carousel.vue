<template>
  <div class="box">
    <CarouselSlide v-for="(slide, index) in services" 
      :key="index"
      :slide="slide"
      :index="index"
      :visibles="visibles"
      :direction="direction" 
    />
    <button class="next" @click="next">
      <i class="material-icons icon-size">keyboard_arrow_right</i>
    </button>
    <button class="prev" @click="prev">
      <i class="material-icons icon-size">keyboard_arrow_left</i>
    </button>
  </div>
</template>

<script>
import CarouselSlide from './carousel-slide'
import { mapState } from 'vuex'
export default {
  name: 'Carousel',
  components: {
    CarouselSlide
  },
  props: ['services'],
  computed: {
    ...mapState(['visibles']),
    ...mapState(['direction']),
    slidesLen () {
      return this.services.length
    }
  },
  methods: {
    next () {
      let tmp = {
        counter: this.visibles,
        dir: this.direction
      };
      if (this.visibles >= this.slidesLen - 1) {
        tmp.counter = 0
      } else {
        tmp.dir = 'left'
        tmp.counter++
      }
      this.$store.dispatch('next', tmp)
    },
    prev () {
      let tmp = {
        counter: this.visibles,
        dir: this.direction
      };
      if (this.visibles <= 0) {
        tmp.counter = this.slidesLen - 1
      } else {
        tmp.dir = 'right'
        tmp.counter--
      }
      this.$store.dispatch('prev', tmp)
    }
  }
}
</script>
