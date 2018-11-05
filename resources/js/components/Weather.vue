<template>
    <tile :position="position" modifiers="overflow transparent">
        <section>
            <img :src="'https://api.buienradar.nl/image/1.0/RadarMapNL?w=500&h=512&a=' + sequence" alt="Image">
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
            sequence: 1
        };
    },

    created() {
        setInterval(this.addSequence, 60000);
    },

    methods: {
        addClassModifiers,


        addSequence() {
            this.sequence++;
        },
    },
};
</script>
