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
        max-width: 400px;
    }

    .upper {
        font-family: 'Helvetica', 'Arial', sans-serif;
        color: white;
        text-shadow: 3px 2px black;
        font-weight: bold;
        font-size: 3em;
    }

    .under
    {
        position:absolute;
        z-index:-1;
    }
    .over
    {
        position:absolute;
        z-index:0;
    }

</style>
<template>
    <div>
        <i-odometer
                class="iOdometer"
                :value="subscribers"
        ></i-odometer>

        <div id="myProgress">
            <div id="myBar">{{ progress * 100 }}%</div>
        </div>
        <h1 class="upper">Sub Goal: {{ goal.toLocaleString() }}</h1>
        <img src="/img/kronos2.png" class="over" id="mugShot">
        <img src="/img/kronos1.png" class="under">
    </div>
</template>

<script>
    import IOdometer from 'vue-odometer';
    export default {
        components: {
            IOdometer
        },
        props: ['channel','goal','start'],
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
        computed: {
            progress () {
                let progress = 0;
                if ((this.subscribers - this.start) / (this.goal - this.start) > 1) {
                    progress = 1;
                }
                else if ((this.subscribers - this.start) / (this.goal - this.start) < 0) {
                    progress = 0;
                }
                else {
                    progress = (this.subscribers - this.start) / (this.goal - this.start);
                }
                progress = progress.toFixed(2);

                $("#myBar").width(progress * 100 + "%");
                $("#mugShot").css('opacity', progress);

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
