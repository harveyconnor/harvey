<style scoped>
    .odometer.odometer-theme-default {
        /*
            Note font is glitched somewhat
            The spacing changes when number changes
        */
        font-family: 'Righteous', 'Arial', sans-serif;
        color: white;
        font-weight: bold;
        text-align: center;
    }

    .iOdometer {
        font-size: 6em;
        margin: 0;
    }

</style>
<template>
    <div style="text-align: center">
        <i-odometer
                class="iOdometer"
                :value="subscribers"
        ></i-odometer>
    </div>
</template>

<script>
    import IOdometer from 'vue-odometer';
    export default {
        components: {
            IOdometer
        },
        props: ['channel'],
        data(){
            return {
                subscribers: 0,
            }
        },
        methods: {
            loadSubs() {
                $.get('/youtube/' + this.channel + '/live', function (response) {
                    this.subscribers = parseInt(response);
                }.bind(this));
            }
        },
        created() {

            this.loadSubs();

            setInterval(function () {
                this.loadSubs();
            }.bind(this), 5000);
        }
    }
</script>
