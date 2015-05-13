//
//  RootViewController.h
//  Jumio
//

#import <UIKit/UIKit.h>

@interface RootViewController : UIViewController<UIGestureRecognizerDelegate, UIWebViewDelegate>

@property(nonatomic, retain) IBOutlet UIWebView *webView;
@property(nonatomic, retain) IBOutlet UIActivityIndicatorView *activityView;

@end
