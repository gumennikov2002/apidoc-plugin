<link rel="stylesheet" href="/plugins/gumennikov2002/apidoc/assets/css/main.css">

<div class="list-widget-container">
    <div class="list-widget list-scrollable-container " id="ListStructure">
        <div class="list-content">
            <h1><?= trans('gumennikov2002.apidoc::lang.docs.layout.index.title') ?></h1>
            <div class="cards">
                <?php foreach ($docs as $doc): ?>
                    <?php $uid = uniqid() ?>
                    <div class="card" data-card-id="<?= $uid ?>">
                        <div class="header">
                            <span class="title"><?= $doc['title'] ?></span>
                            <?php if (!empty($doc['tags']) && is_array($doc['tags']) ): ?>
                                <div class="tags">
                                    <?php foreach ($doc['tags'] as $tag): ?>
                                        <span class="tag"><?= $tag ?></span>
                                    <?php endforeach ?>
                                </div>
                            <?php elseif (isset($doc['tag'])): ?>
                                <span class="tag"><?= $doc['tag'] ?></span>
                            <?php endif ?>
                        </div>
                        <div class="specs">
                            <span class="method"><?= strtoupper($doc['method']) ?></span>
                            <span class="url"><?= $doc['url'] ?> </span>
                        </div>
                        <div class="body">
                            <div class="params">
                                <?php if (!empty($doc['params'])): ?>
                                    <div class="param-items">
                                        <b><?= trans('gumennikov2002.apidoc::lang.docs.layout.index.parameters') ?>:</b>

                                        <?php foreach ($doc['params'] as $param): ?>
                                            <div class="param-item">
                                                <span class="param-item-title">
                                                    <?= $param['title'] ?>
                                                    <?php if (isset($param['required']) && $param['required']): ?>
                                                        <span style="color: red; margin-left: -3px">*</span>
                                                    <?php endif ?>

                                                    <?php if (isset($param['title'])): ?>
                                                        <span>- <?= $param['description'] ?></span>
                                                    <?php endif ?>
                                                </span>
                                                <small class="param-item-in">(<?= $param['in'] ?>)</small>
                                                <?php if (isset($param['example'])): ?>
                                                    <?php if (is_array($param['example'])): ?>
                                                        <small class="param-item-example-array"><?= trans('gumennikov2002.apidoc::lang.docs.layout.index.example') ?>:</small>

                                                        <?php $jsonExample = json_encode($param['example']) ?>

                                                        <div class="param-item-example-code draw-json" data-code='<?= $jsonExample ?>'>

                                                        </div>
                                                    <?php else: ?>
                                                        <small class="param-item-example"><?= trans('gumennikov2002.apidoc::lang.docs.layout.index.example') ?>: <?= $param['example'] ?></small>
                                                    <?php endif ?>
                                                <?php endif ?>

                                                <?php if (!empty($param['comments'])): ?>
                                                    <small><?= trans('gumennikov2002.apidoc::lang.docs.layout.index.comments') ?>:</small>
                                                    <div class="param-item-comments">
                                                        <?php foreach ($param['comments'] as $comment): ?>
                                                            <small class="param-item-comment"><?= $comment ?></small>
                                                        <?php endforeach ?>
                                                    </div>
                                                <?php endif ?>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                <?php endif ?>
                            </div>
                            <div class="responses">
                                <?php if (!empty($doc['responses'])): ?>
                                    <div class="response-items">
                                        <b><?= trans('gumennikov2002.apidoc::lang.docs.layout.index.responses') ?>:</b>

                                        <?php foreach ($doc['responses'] as $res): ?>
                                            <div class="response-item">
                                                <span class="response-item-status"><?= $res['status_code'] ?>:</span>

                                                <?php $jsonResponse = json_encode($res['response']) ?>

                                                <div class="response-item-json draw-json" data-code='<?= $jsonResponse ?>'></div>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="manage">
                            <span class="manage-show" onclick="showCardBody('<?= $uid ?>')"><?= trans('gumennikov2002.apidoc::lang.docs.layout.index.manage_show') ?></span>
                            <span class="manage-hide" onclick="showCardBody('<?= $uid ?>', false)"><?= trans('gumennikov2002.apidoc::lang.docs.layout.index.manage_hide') ?></span>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>

<script src="/plugins/gumennikov2002/apidoc/assets/js/main.js"></script>
