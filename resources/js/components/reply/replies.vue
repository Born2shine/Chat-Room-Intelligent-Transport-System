<template>
    <div>
        <reply 
        v-for="(reply,index) in content" 
        :key="reply.id" 
        :index=index
        :data="reply"></reply>
    </div>
</template>

<script>
import Reply from './reply'
export default {
    data(){
        return{
            content:this.question.replies
        }
    },
    props:['question'],
    components:{Reply},
    created(){
        this.listen()
    },
    methods:{
        listen(){
            EventBus.$on('newReply', (reply) => {
                this.content.unshift(reply)
                window.scroll(0,0)
            })

            EventBus.$on('deleteReply',(index)=>{
                axios.delete(`/api/question/${this.question.slug}/reply/${this.content[index].id}`)
                .then(res => {
                    this.content.splice(index,1)
                })
                
            })
        }
    }
}
</script>

<style>

</style>
