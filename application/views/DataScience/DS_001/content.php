<h1 class="mt-0 font-alt" style="">The Curse of Dimensionality – Explained </h1>
<p>
One of the major challenges faced while data modeling is the large number of variables/features/parameters in the data or the high dimensionality of the data. You will come across datasets with 20, 40 and even 100+ features which looks very daunting to work with. And it makes sense, because all organizations collect a lot data that they can monetize. Companies want to know everything about everything that they are doing and with so much of advancement in storage and computing technologies, why to hold back on anything. Right? The focus is on not leaving any opportunity, so all kind of information, that can be collected, is collected to work upon.
</p>

<div class="blog-media mt-40 mb-40 mb-xs-30">
    <?php echo img('assets/images/DataScience/'.$article_id.'/1.jpg',FALSE); ?>
</div>

<p>
However, when it comes to analyze and model the data, the large number of dimensions is actually a huge problem. The curse of dimensionality refers to various phenomena that arise when analyzing and organizing data in high-dimensional spaces (often with hundreds or thousands of dimensions) that do not occur in low-dimensional settings such as the three-dimensional physical space of everyday experience. We can say that the number of dimensions is directly proportional to the computational complexity, and it also makes it difficult to model and visualize the data later.  
</p>

									
<p>It is very essential to work with only the important features that significantly help in the data modeling and drop the unnecessary features. The input dataset must be in the refined form in order to build a good model. It is said that best results can be achieved by refining the data properly and using an appropriate learning algorithm to do the learning. Even a very power machine learning algorithm cannot deliver the best results if the input dataset is not well refined. So, it becomes very useful to clean the data and reduce the dimensionality to make the modeling efficient. The diagram below might give you more clarity on this
</p>


<div class="blog-media mt-40 mb-40 mb-xs-30">
    <?php echo img('assets/images/DataScience/'.$article_id.'/2.jpg',FALSE); ?>
</div>

<blockquote>

                                        <cite title="Source Title">

                                        “More data beats a clever algorithm”    

                                        </cite> 

                                            

                                    </blockquote>


<p>There are mainly two ways in which the dimensionality of the data can be reduced. 
    <b>
       
       1>	Feature Selection
        <br>
       2>	Feature Extraction
       
    </b>
</p>

<p><b>Features selection</b> reduces the number of features by removing the unnecessary variables that do not contribute significantly to building the model. This is done by identifying which features are required and which are not, and then refining the data accordingly. There are three ways of doing this:
    <br/>
    <b>
        1>	Forward Selection 
        <br/>
        2>	Backward Elimination
        <br/>
        3>	Stepwise Selection
        
    </b>
</p>

<div class="blog-media mt-40 mb-40 mb-xs-30">
    <?php echo img('assets/images/DataScience/'.$article_id.'/3.jpg',FALSE); ?>
</div>

<p><b>Feature Extraction </b>on the other hand is used to reduce the dimensionality by transforming the data into lower dimensions, such that these new dimensions carry the information about the variance of the original data that can be used effectively for modeling. It is comparatively easier to model the data with less number of dimension and it also becomes very easy to visualize the data. The most popular method for feature extraction is Principal Component Analysis(PCA) where principal components capture the variance information in the data. We can identify the principal components that carry most the most of the variance information and use them for further modeling and visualization. It is an unsupervised learning approach in which all the features are transformed, and only numeric variables can undergo this transformation.

</p>

<p>There are lot of other ways to reduce the dimensionality of the data, but to get you started these are the ones you can stress upon. If you have any suggestions on better approaches to reduce the dimensionality, please leave a comment below. 
</p>
                                