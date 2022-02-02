<template>
    <div class="p-4 flex-grow">
        <div class="text-gray-300 mb-4">
            <app-tweet-username :user="notification.data.user" /> mentioned you
            in a tweet
        </div>
        <p class="text-gray-500">
            {{ notification.data.tweet.body }}
        </p>
    </div>
</template>

<script>
export default {
    name: "AppNotificationTweetMentionedIn",
    props: {
        notification: {
            required: true,
            type: Object,
        },
    },
};
</script>
