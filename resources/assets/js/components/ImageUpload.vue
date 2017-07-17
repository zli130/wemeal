<template lang="html">
    <div class="image">
        <image-preview :preview="value" @close="$emit('input', null)" v-if="value"></image-preview>
        <div class="image_upload m-b-5 p-l-10">
            <input type="file" name="image" @change="upload">
        </div>
    </div>
</template>

<script>

import ImagePreview from './ImagePreview.vue'

export default {
    components: {
        ImagePreview
    },

    props: {
        value : {
            type: [String, File],
            default: null
        }
    },

    methods: {
        upload(e) {
            const files = e.target.files

            if (files && files.length > 0) {
                this.$emit('input', files[0])
            } else {
                this.$emit('input', null)
            }
        }
    }
}
</script>

<style lang="scss">
    .image {
        &_upload {
            height: 50px;
            background: #fafafa;
            border: 1px dashed rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: left;
            align-items: center;
        }
    }

</style>
