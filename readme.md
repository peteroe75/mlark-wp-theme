# No More Page Builders!
Tested with PHP 8.3/ WP 7.0

## MEADOWLARK IT SKELETON WP THEME

### What the theme does

It allows you to write HTML/CSS/JS into WordPress posts and pages. It defines a custom post type, out of the box containing a header/footer post that contains the HTML for the header/footer.

It also contains a demo component and system for adding it to other posts/pages as either a rooted shortcode or editable object.

Page/post content is saved on a per-item basis to the database. You simply paste the HTML into the native WordPress post/page editor and on the frontend it is rendered as written.

This allows LLM-based HTML/CSS/JS to be directly pasted into the editor. While this sounds primitive, you can establish agentic workflows to this modular setup very easily.

It keeps the entire frontend HTML codebase compartmentalized in the database (like page builders). Because this is WordPress, you get the vast existing ecosystem, but now the frontend can return to native primitive web languages.

Agentic and normal AI mathematically will be able to use this model—and already are for my company—to write large complex frontend codebases in stable web languages, predictively and consistently.

It also allows the old-hat web developers to build how they want in HTML/CSS/JS without the baggage of a builder or theme framework.

# INSTALL VIDEO: https://youtu.be/qTST4AvZrDg

---

### The recommended structure of CSS

- **styles.css**  
  Unchanged from GitHub, only defines primitives

- **admin.css**  
  Untouched from GitHub, does backend stuff

- **site.css**  
  THIS IS SITE SPECIFIC, this defines “this site’s” global CSS

- **headfoot.css**  
  This defines header and footer CSS, basically the last styles before the actual page. Optionally use CSS area of WP code block.

- **Page CSS**  
  This is where you write complex page section css for the html, NEW WITH WP 7.0 NATIVE CSS Area of code block can be used


That is it. You are free to make as much as you want global, but modern web has so many one-off sections we end up rewriting it all anyway per section.

A strategy can be just inlining on a per-page basis. Posts are not the same—you will have some sort of global `post.css` / `product.css`.

.mlark-wrap and .mlark-const are setup out of the box to provide basic viewwidth boilerplate. 

---

### How to build PHP functions to mimic common plugins

This is a static theme. Because of this, you do not need to worry about updating it past simple PHP calls that will become outdated as time goes on.

Because of this, I advise using the theme as a base to create additional mild PHP functionality natively in your site instead of using a code snippets manager as we do.

Yes, this creates an “unmaintainable professional PHP environment.” However, in 2026 we have LLMs, so that simply is not as big of a problem as it has been.

---

### HTML / JS

NEW FOR WP 7.0

New "CustomHTML" block has tabbed interface for adding HTML/JS/CSS on a per block basis nativly. As of 5/27/2026 I am not touching it as I fear it could break backwards compatability. 

7/21/2026:

Updating theme to fully support new block type. It really makes this theme work much cleaner and more safely! 

---

### External plugins

Should work better than with conventional builders.

---

### GOTCHAS

You must be very familiar with traditional HTML/JS/CSS/PHP/WordPress for this to yield a real site.

With that said, you can use LLMs to sort through mistakes and learn very quickly.

The idea of this theme is that once a site is set up, even a novice web person can get in and start making heavy changes without breaking anything—or at least quickly being able to fix it.

**PHP IS NOT A FRONTEND LANGUAGE. REMEMBER, KIDDIES.**

Other than that, copy and paste away—that’s the point. When the LLMs start choking, break it into smaller pieces like you should have done in the first place.

The end product, if done well, is more stable and a better value for the client than any plugin/theme/page-builder vendor lock-in hotness.

Return to primitives. It’s time.

---

![Hero screenshot](https://raw.githubusercontent.com/peteroe75/mlark-wp-theme/main/always-has-been.jpg)


 This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License along
    with this program; if not, write to the Free Software Foundation, Inc.,
    51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.

**Peter Roe**



