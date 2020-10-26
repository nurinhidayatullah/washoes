<template>
    <tr>
        <td class="number">{{cart.id}}</td>
        <td>{{cart.title}}</td>
        <td>{{cart.desription}}</td>
        <td class="action">
            <button @click.prevent="update"><i class="material-icons">create</i></button><button @click.prevent="destroy"><i class="material-icons">delete</i></button>
        </td>
    </tr>
</template>

<script>
export default {
    name: 'CartItem',
    props: ['cart'],
    methods: {
        destroy() {
          this.$store.dispatch('destroy', this.cart.id)  
        },
        update() {
          this.$router.push(`/edit/?item=${this.cart.id}`)  
        }
    }
}
</script>
