<style scoped>
    .odometer.odometer-theme-default {
        /*
            Note font is glitched somewhat
            The spacing changes when number changes
        */
        font-family: 'Helvetica', 'Arial', sans-serif;
        color: white;
        text-align: center !important;
        text-shadow: 3px 2px black;
        font-weight: bold;
    }

    .iOdometer {
        font-size: 8em;
        margin: 0;
        text-align: center !important;
    }
</style>
<template>
    <div style="text-align: center !important;">
        <i-odometer
                class="iOdometer"
                :value="followers"
        ></i-odometer>
    </div>
</template>

<script>
    import IOdometer from 'vue-odometer';
    export default {
        components: {
            IOdometer
        },
        data(){
            return {
                followers: 0,
            }
        },
        methods: {
            load() {
                $.get('/twitch/live', function (response) {
                    this.followers = parseInt(response);
                }.bind(this));
            }
        },
        created() {

            this.load();

            setInterval(function () {
                this.load();
            }.bind(this), 5000);
        }
    }
</script>
