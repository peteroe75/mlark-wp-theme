### No More Page Builders!

## MEADOWLARK IT SKELETON WP THEME

#What the theme does:

It allows you to write HTML/CSS/JS into wordpress posts and pages, it defines a custom post type, out of the box containing a header/footer post that contain the html for the header/footer
Page/post content is saved on a per item basis to the db. You simply paste the HTML into the native wp post/page editor and on the frontened it is rendered as writen.
This allows LLM based html/css/js to be directly pasted into the editor. While this sounds primitive you can establish agentic workflows to this modular setup very easilty. 
It keeps the entire site code base compartmentalized in the db. Becase this is wordpress you get the vast exzisting ecosystem, but now the frontend can return to native primitive web languages. 
Agentic and normal AI mathmatically will be able to use this model and are already for my company, to write large complex frontend code bases in stable web languages, predititivly/ consistantly. 
It also allows the the old hat web developers to build how they want in html/css/js without the baggage of a builder or theme framework.



#The recomended structer of CSS is: 

syles.css: unchanged from github, only defines primitives
admin.css: untouched from github, does backend stuffs

site.css: THIS IS SITE SPECIFIC, this defines "this sites" global css
headgfoot.css: This defines header and footer css, basically, the last styles before the actual page.
page css: This is not illistrated in the github, but for smaller sites, embededing styles inline per page works to keep things maintainable by all.

That is it, you are free to make as much as you want global but moden web has so many one off sections we endup rewriting it all anyway per section. 
A stratige can be just inlining on a per page basis. Posts are not the same, you will have some sort of global post/product.css


#How to build PHP function to mimic common plugins:

This is a static theme, because of this, you do not need to worry about updating it past simplt simple PHP calls that will become outdated as time goes on. 
Becauase of this, I advise useing the theme as a base to create additional mild PHP functionality, nativily in your site instead of using a code snippets manager as we do. 
Yes this creates a "unmaintainable professional php enviorment" however, in 2026 we have LLMs, so that simply is not as big of a problem as it has been.


#HTMl/JS:

You build pages with HTML, you use the native wordpress post and page editor to publish. Thats it. If you want JS advanced functions you can write them inline or ammend them to the static header/footer files in the theme root!


#External plugins:

Should work better than with conventional builders. 


#GOTCHATS

You must be very framiliar with traditional HTML/JS/CSS/PHP/WordPress for this to yeild a real site.
With that said, you can use LLMs to sort threw and make mistakes and learn very quickly. 
The idea of this theme, once a site is setup, even a novice web person can get in and start making heavy changes without breaking anything, or at least quickly being able to fix it.

PHP IS NOT A FRONTEND LANGUAGE REMEMBER KIDDIES. Other than that, copy and paste away, thats the point. When the LLMs start choaking break it into smaller pieces like you should have done in the first place.

The end product, if done well, is more stable and a better value for the client than any plugin/theme/pagebuilder vendor lock hotness. Retun to primitives, its time;



![Hero screenshot](https://raw.githubusercontent.com/peteroe75/mlark-wp-theme/main/always-has-been.jpg)


Peter Roe


