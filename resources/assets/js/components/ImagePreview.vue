<template lang="html">
    <div class="image_preview" v-if="image">
        <img :src="image" class="image is-128x128">
        <a class="button is-danger image_close" @click="$emit('close')">
            &times;
        </a>
    </div>
</template>

<script>
export default {
    props: {
        preview: {
            type: [String, File],
            default: null
        }
    },

    data() {
        return {
            image: null
        }
    },

    created() {
        this.setPreview()
    },

    watch: {
        'preview': 'setPreview'
    },

    methods: {
        setPreview() {
            if (this.preview instanceof File) {
                const fileReader = new FileReader()
                fileReader.onload = (event) => {
                    this.image = event.target.result
                }

                fileReader.readAsDataURL(this.preview)
            } else if (typeof this.preview === 'string') {
                this.image = `/images/${this.preview}`
            } else {
                this.image = null
            }
        }
    }
}
</script>

<style lang="scss">

    .image {

        &_preview {
            height: 128px;
            background: #fafafa;
            border: 1px dashed rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        &_close {
            position: absolute;
            right: 0;
            top: 0;
        }

    }
</style>
