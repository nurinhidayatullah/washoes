import axios from '../plugins/axios'
import Swal from 'sweetalert2'
export const state = () => ({
    services: [],
    carts: [],
    visibles: 0,
    direction: 'left'
})

export const mutations = {
    fetch_services(state, payload) {
        state.services = payload
    },
    fetch_carts(state, payload) {
        state.carts = payload
    },
    setVisibles(state, payload) {
        state.visibles = payload
    },
    setDirection(state, payload) {
        state.direction = payload
    }
}

export const actions = {
    async FETCH_SERVICES ({ commit }) {
        const {data} = await axios.get('/services')
        commit('fetch_services', data.data)
    },
    async FETCH_CARTS ({commit}) {
        const {data} = await axios.get('/carts')
        console.log(data)
        commit('fetch_carts', data.data)
    },
    async destroy({dispatch}, id) {
        await axios.delete(`/carts/${id}`)
        dispatch('FETCH_CARTS')
        Swal.fire({
            icon: 'success',
            title: 'Deleted Successfully',
            text: 'Success delete cart!'
        })
    },
    async update({dispatch}, payload) {
        await axios.put(`carts/${payload.id}`, {
            title: payload.title,
            description: payload.description
        })
        console.log(payload)
        dispatch('FETCH_CARTS')
        Swal.fire({
            icon: 'success',
            title: 'Updated Successfully',
            text: 'Success update cart!'
        })
    },
    next({commit}, payload) {
        commit('setDirection', payload.dir)
        commit('setVisibles', payload.counter)
    },
    prev({commit}, payload) {
        commit('setDirection', payload.dir)
        commit('setVisibles', payload.counter)
    },
    menuClick({commit}, payload) {
        commit('setVisibles', payload)
    },
    async addToCart({dispatch}, payload) {
        await axios.post('/carts', payload)
        dispatch('FETCH_CARTS')
        Swal.fire({
            icon: 'success',
            title: 'Added to Cart',
            text: 'Success add to cart!'
        })
    }
}