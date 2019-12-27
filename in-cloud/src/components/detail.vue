<template>
  <section class="detail-wrapper">
    <common-header></common-header>
    <!--first-section start-->
    <section class="common-section first-section">
      <section class="detail-container">
        <!--main start-->
        <section class="main-wrapper">
          <div class="txt-wrapper">
            <p class="txt-title">这里是大标题想要</p>
            <p class="txt-subtitle">
              <span class="txt-time">2019-04-01</span>
              <span class="txt-label">标签：ios开发</span>
            </p>
          </div>
          <div class="content-wrapper">
            <p class="txt-summary">【摘要】这里是摘要的内容，文字要求简介。</p>
            <div class="content">
              　　时候既然（1）是深冬；渐近故乡时，天气又阴晦（2）了，冷风吹进船舱中，呜呜的响，从篷隙向外一望，苍黄的天底下，远近横着几个萧索（3）的荒村，没有一些活气。我的心禁不住悲凉起来了。
              　　阿！这不是我二十年来时时记得的故乡？
              　　我所记得的故乡全不如此。我的故乡好得多了。但要我记起他的美丽，说出他的佳处来，却又没有影像（4），没有言辞了。仿佛也就如此。于是我自己解释说：故乡本也如此，——虽然没有进步，也未必有如我所感的悲凉，这只是我自己心情的改变罢了，因为我这次回乡，本没有什么好心绪（
            </div>
          </div>
        </section>
        <!--main end-->
      </section>
    </section>
    <!--first-section end-->
    <common-footer></common-footer>
  </section>
</template>

<script>
  import commonHeader from '@/components/common/header'
  import commonFooter from '@/components/common/footer'

  export default {
    name: 'detail',
    data() {
      return {}
    },
    components: {
      commonHeader, commonFooter
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
  @import '@/styles/detail.scss'
</style>
