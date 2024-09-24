<div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: scroll;" id="chat_body">
    <div class="simplebar-content" style="padding: 20px;">

        <?php
        // Merge chat and reply arrays
        $messages = array_merge($chat, $reply);

        // Sort messages by creation date
        usort($messages, function ($a, $b) {
            return strtotime($a->c_date) - strtotime($b->c_date);
        });
        ?>

        <div class="chat-list chat active-chat" data-user-id="1">

            <?php foreach ($messages as $message) { ?>
                <?php if ($message->chat_from != $this->session->userdata('id')) { ?>
                    <div class="hstack gap-3 align-items-start mb-7 justify-content-starthome">
                        <?php if (empty($message->image)) { ?>
                            <img src="../assets/images/profile/default.jpg" alt="user1" width="40" height="40" class="rounded-circle">
                        <?php } else { ?>
                            <img src="/mhs_micro/profile/<?= $message->image ?>?t=<?= time() ?>" alt="user1" width="40" height="40" class="rounded-circle">
                        <?php } ?>
                        <div>
                            <h6 class="fs-1 text-muted">
                                <?= date('M j, Y, g:i a', strtotime($message->c_date)) ?>
                            </h6>
                            <div class="p-2 text-bg-light rounded-2 d-inline-block text-dark fs-3">
                                <?= $message->content ?>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="hstack gap-3 align-items-start mb-7 justify-content-end">
                        <div class="text-end">
                            <h6 class="fs-1 text-muted"><?= date('M j, Y, g:i a', strtotime($message->c_date)) ?></h6>
                            <div class="p-2 bg-info-subtle text-dark rounded-2 d-inline-block fs-3">
                                <?= $message->content ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>

        </div>

    </div>
</div>

<script>
    // Function to scroll to the bottom of the chat container
    function scrollToBottom() {
        var element = document.getElementById("chat_body");
        element.scrollTop = element.scrollHeight;
    }

    // Call the function to scroll to the bottom when the page loads
    window.onload = function() {
        scrollToBottom();
    };

    // Call the function to scroll to the bottom when new content is added
    $(document).ready(function() {
        scrollToBottom();
    });
</script>