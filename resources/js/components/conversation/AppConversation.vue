<template>
    <div>convo</div>
</template>

<script>
export default {
    name: "AppConversation",
    props: {
        id: {
            required: true,
            type: String,
        },
    },
    mounted() {
        console.log(this.id);
    },
};
</script>
