<template>
    <div>
        <h1>graphics form</h1>
        <input class="form-control" type="text" v-model="title" placeholder="Title">
        <input class="form-control" type="text" v-model="description">
        <input class="form-control" type="file" id="imageUpload">
        <button class="btn btn-primary" @click="submitImage">Submit</button>
        <hr>
        <div class="row" v-for="chunk in chunkedItems">
            <div class="card" v-for="image in chunk">
                <img :src="image.location" :alt="image.name" @click="showModal(image)">
                <h2>{{ image.title }}</h2>
                <!--<p class="card-text">{{ image.description }}</p>-->
            </div>
        </div>
        <modal :image="selectedImage" v-if="showPreview"></modal>
    </div>
</template>

<script>
    import Modal from '../Modal.vue';
    export default {
        components: {
            Modal: Modal
        },
        data() {
            return {
                images: JSON.parse(images),
                title: '',
                description: '',
                showPreview: false,
                selectedImage: ''
            }
        },
        computed: {
            chunkedItems () {
                return _.chunk(_.toArray(this.images), 3);
            }
        },
        methods: {
            submitImage() {
                let form = new FormData();
                form.append('title', this.title);
                form.append('description', this.description);
                form.append('image', $('#imageUpload')[0].files[0]);
                axios.post("/gallery/graphics/new", form).then(function (res) {
                    alert('worked!');
                });
            },
            showModal(image) {
                this.showPreview = true;
                this.selectedImage = image;
            }
        }
    }
</script>
