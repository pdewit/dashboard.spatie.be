<template>
    <tile :position="position" modifiers="overflow transparent">
        <section>
            <div v-for="problem in problems">
                <h2>{{ problem.road }}</h2>
                <ul>
                    <li class="traffic-li" v-for="roadWork in problem.events.roadWorks">
                        <span>{{ roadWork.description }}</span>
                    </li>
                </ul>
                <ul>
                    <li class="traffic-li" v-for="trafficJam in problem.events.trafficJams">
                        <span>{{ trafficJam.description }}</span>
                    </li>
                </ul>
            </div>
        </section>
    </tile>
</template>

<script>
import Tile from './atoms/Tile';
import { addClassModifiers } from '../helpers';
import axios from 'axios';

export default {
    components: {
        Tile,
    },


    props: ['position'],

    data() {
        return {
            roads: ['A4', 'A13', 'A20'],
            problems: []
        };
    },

    created() {
        this.processTraffic();
        setInterval(this.processTraffic, 60000);
    },

    methods: {
        addClassModifiers,


        processTraffic() {
            axios.get('https://www.anwb.nl/feeds/gethf')
                .then(response => {
                    this.problems = _.filter(response.data.roadEntries, o => { return this.roads.includes(o.road); });
                });
        },
    },
};
</script>
