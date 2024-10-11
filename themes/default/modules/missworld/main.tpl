<!-- BEGIN: main -->
<div class="missworld-contestants">
    <h2 class="title-missworld">{LANG.missworld_list}</h2>
    <!-- BEGIN: search_form -->
        {SEARCH_FORM}
    <!-- END: search_form -->
    <div class="contestant-grid">
        <!-- BEGIN: loop -->
        <div class="contestant-card" data-id="{DATA.id}" itemscope itemtype="https://schema.org/Person">
            <a href="{DATA.link}" itemprop="url">
                <img src="{DATA.thumb}" alt="{DATA.fullname}" class="contestant-image" itemprop="image">
            </a>
            <h3 class="contestant-name" itemprop="name">{DATA.fullname}</h3>
            <p class="vote-count" itemprop="interactionStatistic" itemscope itemtype="https://schema.org/InteractionCounter">
                <span itemprop="interactionType" itemscope itemtype="https://schema.org/VoteAction">
                    {LANG.vote_count}: <span itemprop="userInteractionCount">{DATA.vote}</span>
                </span>
            </p>
            <button class="vote-button" data-contestant-id="{DATA.id}">{LANG.vote}</button>
        </div>
        <!-- END: loop -->
    </div>
    <!-- BEGIN: generate_page -->
    <div class="text-center generate-page">
        {GENERATE_PAGE}
    </div>
    <!-- END: generate_page -->
</div>
<div id="voting-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="modal-grid">
            <div class="modal-image">
                <img id="modal-contestant-image" src="" alt="Contestant Image">
            </div>
            <div class="modal-form">
                <h2>{LANG.vote_for} <span id="contestant-name"></span></h2>
                <!-- BEGIN: error -->
                    <div class="alert alert-danger">{ERROR}</div>
                <!-- END: error -->
                <div class="progress-dots">
                    <div class="progress-step">
                        <div class="progress-dot active">{LANG.number_one}</div>
                        <span>{LANG.choose_contestant}</span>
                    </div>
                    <div class="progress-step">
                        <div class="progress-dot">{LANG.number_two}</div>
                        <span>{LANG.verify}</span>
                    </div>
                </div>
                <form id="voting-form">
                    <input type="hidden" id="contestant-id" name="contestant_id">
                    <div class="form-group">
                        <label for="voter-name">{LANG.voter_name}</label>
                        <input type="text" id="voter-name" name="voter_name" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">{LANG.email}</label>
                        <input type="email" id="email" name="email" required class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">{LANG.submit_vote}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="verification-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h4 class="modal-title text-center">{LANG.email_verification}</h4>
        <div class="progress-dots">
            <div class="progress-step">
                <div class="progress-dot">{LANG.number_one}</div>
                <span>{LANG.choose_contestant}</span>
            </div>
            <div class="progress-step">
                <div class="progress-dot active">{LANG.number_two}</div>
                <span>{LANG.verify}</span>
            </div>
        </div>
        <div class="alert alert-info verification-email-alert" role="alert">
            {LANG.verification_sent_to}: <strong id="verification-email-display"></strong>
        </div>
        <form id="verification-form">
            <input type="hidden" id="verification-contestant-id" name="contestant_id">
            <input type="hidden" id="verification-email" name="email">
            <div class="form-group">
                <label for="verification-code">{LANG.verification_code}:</label>
                <div class="input-group">
                    <input type="text" id="verification-code" name="verification_code" required class="form-control">
                    <span class="input-group-btn">
                        <button id="resend-code-btn" type="button" class="btn btn-default">{LANG.resend_code}</button>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">{LANG.verify_vote}</button>
            </div>
        </form>
    </div>
</div>
<div id="toast" class="toast"></div>
<div id="loading-overlay" class="loading-overlay">
    <div class="loader"></div>
</div>
<!-- END: main -->
