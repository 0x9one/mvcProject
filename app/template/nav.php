<nav class="main_navigation">
    <div class="employee_info">
        <div class="profile_picture">
            <img src="img/user.png" alt="User Profile Picture" />
            <span class="name"><?= $this->session->u->profile->FirstName ?> <?= $this->session->u->profile->LastName ?></span>
            <span class="privilege"><?= $this->session->u->GroupName ?></span>
        </div>
    </div>
    <ul class="app_navigation">
        <li class="<?= $this->matchUrl('/')  === true ? ' selected' :  '' ?>"><a href="/"><i class="fas fa-tachometer-alt ml"></i><?= $text_general_statistics ?></a></li>
        <li class="submenu">
            <a href="javascript:;"><i class="fas fa-credit-card"></i><?= $text_transactions ?></a>
            <ul>
                <li><a href="/purchases"><i class="fas fa-gift"></i> <?= $text_transactions_purchases ?></a></li>
                <li><a href="/sales"><i class="fas fa-shopping-bag"></i> <?= $text_transactions_sales ?></a></li>
            </ul>
        </li>
        <li class="submenu">
        <a href="javascript:;"><i class="fas fa-money-bill-alt"></i><?= $text_expenses ?></a>
            <ul>
                <li><a href="/expensescategories"><i class="fas fa-list-ul"></i> <?= $text_expenses_categories ?></a></li>
                <li><a href="/dailyexpenses"><i class="fas fa-money-bill"></i> <?= $text_expenses_daily_expenses ?></a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="javascript:;"><i class="fas fa-store-alt"></i><?= $text_store ?></a>
            <ul>
                <li><a href="/productcategories"><i class="fas fa-archive"></i> <?= $text_store_categories ?></a></li>
                <li><a href="/productslist"><i class="fas fa-tag"></i> <?= $text_store_products ?></a></li>
            </ul>
        </li>
        <li><a href="/clients"><i class="fas fa-address-card"></i><?= $text_clients ?></a></li>
        <li class="<?= $this->matchUrl('/suppliers')  === true ? ' selected' :  '' ?>"><a href="/suppliers"><i class="fas fa-user-friends"></i><?= $text_suppliers ?></a></li>
        <li class="submenu">
            <a href="javascript:;"><i class="fas fa-users"></i><?= $text_users ?></a>
            <ul>
                <li><a href="/users"><i class="fa fa-user-circle"></i> <?= $text_users_list ?></a></li>
                <li><a href="/usersgroups"><i class="fa fa-user-friends"></i> <?= $text_users_groups ?></a></li>
                <li><a href="/privileges"><i class="fa fa-key"></i> <?= $text_users_privileges ?></a></li>
            </ul>
        </li>
        <li><a href="/reports"><i class="far fa-chart-bar"></i><?= $text_reports ?></a></li>
        <li><a href="/notifications"><i class="fas fa-bell"></i><?= $text_notifications ?></a></li>
        <li><a href="/auth/logout"><i class="fas fa-sign-out-alt"></i><?= $text_log_out ?></a></li>
    </ul>
</nav>
<div class="action_view">
    <?php $messages = $this->messenger->getMessages(); if(!empty($messages)): foreach ($messages as $message): ?>
    <p class="message t<?= $message[1] ?>"><?= $message[0] ?><a href="" class="closeBtn"><i class="fa fa-times"></i></a></p>
<?php endforeach;endif; ?>