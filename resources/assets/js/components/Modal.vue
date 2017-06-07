<style>
    /* The Modal (background) */
    .modal {
        display: block;
        position: fixed; /* Stay in place */
        padding-top: 50px; /* Location of the box */
        padding-bottom: 50px;
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

    /* Modal Content (Image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        height: auto;
        max-width: 800px;
        max-height: 800px;
    }

    /* Caption of Modal Image (Image Text) - Same Width as the Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation - Zoom in the Modal */
    .modal-content, #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.3s;
        animation-name: zoom;
        animation-duration: 0.3s;
    }

    @-webkit-keyframes zoom {
        from {-webkit-transform:scale(0)}
        to {-webkit-transform:scale(1)}
    }

    @keyframes zoom {
        from {transform:scale(0)}
        to {transform:scale(1)}
    }

    /* The Close Button */
    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.2s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px){
        .modal-content {
            width: 100%;
        }
    }
</style>
<template>
    <!-- The Modal -->
    <div id="imagePreview" class="modal">

        <!-- The Close Button -->
        <span class="close" @click="$parent.showPreview = false">&times;</span>

        <!-- Modal Content (The Image) -->
        <img :src="image.location" class="modal-content">

        <!-- Modal Caption (Image Text) -->
        <div id="caption">
            <h3>{{ image.title }}</h3>
            <p>{{ image.description }}</p>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {

            }
        },
        props: ['image']
    }
</script>