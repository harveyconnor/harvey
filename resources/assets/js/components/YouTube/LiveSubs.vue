<style scoped>
    .odometer.odometer-theme-default {
        /*
            Note font is glitched somewhat
            The spacing changes when number changes
        */
        font-family: 'Helvetica', 'Arial', sans-serif;
        color: white;
        text-align: center;
        text-shadow: 3px 2px black;
        font-weight: bold;
    }

    .iOdometer {
        font-size: 8em;
        margin: 0;
    }

    #myBar {
        width: 0;
        height: 30px;
        background-color: #4CAF50;
        text-align: center; /* To center it horizontally (if you want) */
        line-height: 30px; /* To center it vertically */
        color: white;
        font-family: 'Helvetica', 'Arial', sans-serif;
        font-weight: bold;
    }

    #myProgress {
        background-color: #f7f7f7;
        box-shadow: 3px 2px black;
        max-width: 300px;
    }

    .upper {
        font-family: 'Helvetica', 'Arial', sans-serif;
        color: white;
        text-shadow: 3px 2px black;
        font-weight: bold;
    }

</style>
<template>
    <div>
        <i-odometer
                class="iOdometer"
                :value="subscribers"
        ></i-odometer>

        <div id="myProgress">
            <div id="myBar">{{ progress*100 }}%</div>
        </div>
        <h1 class="upper">Sub Goal: {{ goal.toLocaleString() }}</h1>
        <br>
        <input v-model="goal">
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
                goal: 54450,
            }
        },
        methods: {
            loadSubs() {
                $.get('/youtube/'+this.channel+'/live', function (response) {
                    this.subscribers = parseInt(response);
                }.bind(this));
            }
        },
        computed: {
            progress () {
                let progress = 0;
                if(this.subscribers/this.goal > 1){
                    progress = 1;
                }else{
                    progress = this.subscribers/this.goal;
                }
                progress = progress.toFixed(2);

                $("#myBar").width(progress*100+"%");

                return progress;
            },
        },
        created() {
            this.loadSubs();

            setInterval(function () {
                this.loadSubs();
            }.bind(this), 5000);
        }
    }
</script>
