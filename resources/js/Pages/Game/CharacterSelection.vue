<template>
    <div class="col-sm">
        <select name="characters" id="characters" v-model="selectedCharacter">
            <option
                v-for="(character, index) in characters"
                :key="index"
                :value="character"
                >
                {{ character.name }}
            </option>
        </select>
        <button @click="sendCharacter()">Send</button>
    </div>
</template>
<script>
import Button from '../../Jetstream/Button.vue'
import Input from '../../Jetstream/Input.vue'
export default {
  components: { Input, Button },
    props: ['characters', 'game',],
    data: function() {
        return {
            selectedCharacter: '',
            newPlayer: [],
        }
    },
    methods: {
        sendCharacter() {
            const idx = Math.floor(Math.random() * this.characters.length);
            this.selectedCharacter = this.characters[idx];
            if(this.selectedCharacter == '') {
                return;
            }
            axios.post('/chat/gamerooms/' + this.game.id + '/characters/' + this.selectedCharacter.id + '/newPlayer', {
                selectedCharacter: this.selectedCharacter
            })
            .then( response => {
                if(response.status == 200) {
                    this.selectedCharacter = '';
                    this.newPlayer = response.data;
                    this.$emit('playercreated', this.newPlayer);
                }
            })
            .catch( error => {
                console.log( error );
            })
        }
    }
}
</script>