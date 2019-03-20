jQuery(document).ready(function($) {
  const entry = $("#blog-loop-entry");

  if (!entry.length) return;

  bindClick();

  function bindClick() {
    const target = entry.find("div#blog-loop-load-more");
    target.click(createClickHandler(target));
  }

  function createClickHandler(target) {
    return async function onClick(e) {
      const nextPage = Number(entry.attr("data-page")) + 1 || 2;

      const newPosts = await fetch(
        `${
          window.location.origin
        }/index.php/wp-json/unior-station/v1/posts/${nextPage}`
      );

      const newNodes = await newPosts.text();
      entry.append(newNodes);

      entry.attr("data-page", nextPage);

      // remove current button and bind to new one, since response came with a button
      target.remove();
      bindClick();
    };
  }
});
