<template>
  <transition :name="direction" mode="in-out">
    <div v-show="index === visibles" class="content">
      <div class="image-size">
       <img class="image" :src="slide.image" />
      </div>
      <p>{{ slide.title }}</p>
      <h1>{{ slide.details }}</h1>
      <NuxtLink :to="`/order/?item=${slide.id}`">
        Order
      </NuxtLink>
    </div>
  </transition>
</template>

<script>
export default {
  name: 'CarouselSlide',
  props: ['index', 'visibles', 'slide', 'direction']
}
</script>
