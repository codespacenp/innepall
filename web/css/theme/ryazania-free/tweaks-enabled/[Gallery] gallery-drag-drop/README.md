# Reorderable gallery (drag & drop)

Allows to rearrange images by mouse, greatly simplifies sorting.

<details open><summary>Demo</summary>

![img](img/demo-drag-drop.gif)
</details>

It is based on famous [**Dragula.js**](https://github.com/bevacqua/dragula) library.

Easy to install, it additionally fixes a few things for gallery templates —

* If Root doesn't contain images, but contains a subfolder with images, there will be no "Empty" message in Root.
*	File name length expanded to 30 chars
* Screen is not dimmed when position is changed by default buttons.

## Installation

* Keep this folder in /tweaks-enabled/
* Template with gallery must have configuration **`orderby='weight'`**, example:

   ```xml
   <cms:template gallery='1'>
      <!-- editable fields here -->

      <cms:config_list_view orderby='weight' />
   </cms:template>
   ```

## Credits

Anton S.\
tony.smirnov@gmail.com
