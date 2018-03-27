<template>
    <p class="control">
        <vue-google-auto-complete
            id="map"
            classname="input"
            name="address"
            placeholder="Start typing"
            v-on:placechanged="getAddressData"
            country="nz"
        >
        </vue-google-auto-complete>
    </p>
</template>
<script>

import VueGoogleAutoComplete from './VueGoogleAutoComplete.vue'

export default {

    components: {
        VueGoogleAutoComplete
    },

    data() {
        return {
            address: ''
        }
    },

    methods: {
        getAddressData: function (addressData, placeResultData) {
            this.address = addressData;
        }
    }
}
</script>

<style lang="css">
</style>
