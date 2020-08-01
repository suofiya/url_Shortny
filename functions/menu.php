<nav class="navbar navbar-fixed-bottom navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <?php echo $info['name']; ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="about">关于我们</a></li>
                <li><a href="api-about">Api接口</a></li>
                <li><a href="tos">使用许可</a></li>
                <li><a href="http://wpa.qq.com/msgrd?v=3&uin=改成你的QQ号&site=qq&menu=yes">联系我们</a></li>
                <li><a href="javascript:void(0)" data-toggle="modal" data-target="#bookmarklet-modal">快捷缩短</a></li>
              
                
                
              
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="statics.php">统计</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<div id="bookmarklet-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">收藏夹快捷功能</h4>
            </div>
            <div class="modal-body">
                <p><?php echo $info['name']; ?> 书签帮助您快速生成短网址而不离开您的网站。</p>
                <p>将下面的链接拖动到书签栏以安装书签。</p>
                <p><a href="javascript:(async () => {if (!window.shorturl) {const poop = await fetch('<?php echo $info['URL']?>/api.php?url=' + encodeURI(location.href)).then(x => x.json());window.shorturl = poop.shorturl ? poop.shorturl : poop.error;}console.log(window.shorturl);const elements = {}; elements.container = document.createElement('div');elements.container.style.cssText = 'z-index:10000;';elements.modal = document.createElement('div');elements.modal.style.cssText = 'z-index:10000;position:fixed;box-shadow: 0 5px 15px -5px rgba(0,0,0,0.8);display:inline-block;color:black;padding:24px;background-color:white;bottom:12px;left:12px;border-radius:12px;font-size:18px;transition:all 250ms ease;opacity:0';elements.a = document.createElement('a');elements.a.innerText = window.shorturl;elements.a.href = window.shorturl;elements.a.addEventListener('click',(e)=>{e.preventDefault();});elements.p = document.createElement('p');elements.p.style.cssText = 'padding:0;margin:0;';elements.p.innerHTML = `<br>功能由 <a href='<?php echo $info['URL']?>'><?php echo $info['name']?> 提供</a>`;elements.modal.appendChild(elements.a);elements.modal.appendChild(elements.p);elements.container.appendChild(elements.modal);const body = document.querySelector('body');body.appendChild(elements.container);requestAnimationFrame(()=>{requestAnimationFrame(()=>{elements.modal.style.opacity = 1;})});setTimeout(()=>{elements.modal.style.opacity = 0;setTimeout(()=>{elements.container.remove();},260);},5000);})();">缩短当前网址</a></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>
<script>
    const bookmarklet = () => {
        alert("Here I am!")
    }
</script>

<?php
            include "zxkf.php";
?>