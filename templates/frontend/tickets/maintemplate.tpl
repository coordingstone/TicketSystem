<!DOCTYPE HTML>

<html xmlns="http://www.w3.org/1999/html">

<head>
    {block name=head}
        {include file="./header.tpl"}
    {/block}


</head>
<body>
    <div id="alert-message" style="display: none;">

    </div>

    <div id="container" class="container-fluid">
        {block name=menu}
            {include file="./menu.tpl"}
        {/block}
        {block name=mainContent}

        {/block}
    </div>
    {block name=footer}
        {include file="./footer.tpl"}
    {/block}
</body>
      {block name=afterBodyBlock}

      {/block}
</html>