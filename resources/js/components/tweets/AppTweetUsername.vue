<template>
    <div>
        <span class="text-gray-300 font-bold">
            {{ user.name }}
        </span>
        <span class="text-gray-600 font-normal">
            <a href="">@{{ user.username }}</a>
        </span>
    </div>
</template>

<script>
export default {
    name: "AppTweetUsername",
    props: {
        user: {
            required: true,
            type: Object,
        },
    },
};
</script>
