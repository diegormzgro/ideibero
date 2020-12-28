<link rel="stylesheet" href="../js/sceditor-2.1.3/minified/themes/default.min.css" />

<script src="../js/sceditor-2.1.3/minified/sceditor.min.js"></script>
 
 <script src="../js/sceditor-2.1.3/minified/formats/bbcode.js"></script>
<script>
// Replace the textarea #example with SCEditor
var textarea = document.getElementById('example');
sceditor.create(textarea, {
  format: 'bbcode',
  style: '../js/sceditor-2.1.3/minified/themes/content/default.min.css'
});
</script>


<script src="../js/sceditor-2.1.3/minified/formats/xhtml.js"></script>
<script>
// Replace the textarea #example with SCEditor
var textarea = document.getElementById('example');
sceditor.create(textarea, {
  format: 'xhtml',
  style: '../js/sceditor-2.1.3/minified/themes/content/default.min.css'
});
</script>